<?php
namespace App\Http\Controllers;

use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Intervention\Image\Constraint;
use Intervention\Image\Facades\Image as InterventionImage;
use TCG\Voyager\Facades\Voyager;

class VoyagerImageType extends \TCG\Voyager\Http\Controllers\ContentTypes\Image
{
    public function handle()
    {
        if ($this->request->hasFile($this->row->field)) {
            $file = $this->request->file($this->row->field);
            $file_extension = $file->getClientOriginalExtension();

            if (isset($this->options->webp) && $this->options->webp) {
                $file_extension = 'webp';
            }

            $path = $this->slug.DIRECTORY_SEPARATOR.date('FY').DIRECTORY_SEPARATOR;

            $filename = $this->getFileName($file, $path, $file_extension);

            $image = InterventionImage::make($file)->orientate();

            $fullPath = $path.$filename.'.'.$file_extension;

            $resize_width = null;
            $resize_height = null;
            if (isset($this->options->resize) && (
                isset($this->options->resize->width) || isset($this->options->resize->height)
            )) {
                if (isset($this->options->resize->width)) {
                    $resize_width = $this->options->resize->width;
                }
                if (isset($this->options->resize->height)) {
                    $resize_height = $this->options->resize->height;
                }
            } else {
                $resize_width = $image->width();
                $resize_height = $image->height();
            }

            $resize_quality = isset($this->options->quality) ? intval($this->options->quality) : 75;

            $image->resize(
                $resize_width,
                $resize_height,
                function (Constraint $constraint) {
                    $constraint->aspectRatio();
                    if (isset($this->options->upsize) && !$this->options->upsize) {
                        $constraint->upsize();
                    }
                }
            );

            if (isset($this->options->watermark) && $this->options->watermark) {
                $image->insert($this->getWatermarkImage($resize_width), 'center');
            }

            $image->encode($file_extension, $resize_quality);

            if ($this->is_animated_gif($file)) {
                Storage::disk(config('voyager.storage.disk'))->put($fullPath, file_get_contents($file), 'public');
                $fullPathStatic = $path.$filename.'-static.'.$file_extension;
                Storage::disk(config('voyager.storage.disk'))->put($fullPathStatic, (string) $image, 'public');
            } else {
                Storage::disk(config('voyager.storage.disk'))->put($fullPath, (string) $image, 'public');
            }

            if (isset($this->options->thumbnails)) {
                foreach ($this->options->thumbnails as $thumbnails) {
                    if (isset($thumbnails->name) && isset($thumbnails->scale)) {
                        $scale = intval($thumbnails->scale) / 100;
                        $thumb_resize_width = $resize_width;
                        $thumb_resize_height = $resize_height;

                        if ($thumb_resize_width != null && $thumb_resize_width != 'null') {
                            $thumb_resize_width = intval($thumb_resize_width * $scale);
                        }

                        if ($thumb_resize_height != null && $thumb_resize_height != 'null') {
                            $thumb_resize_height = intval($thumb_resize_height * $scale);
                        }

                        $image = InterventionImage::make($file)
                            ->orientate()
                            ->resize(
                                $thumb_resize_width,
                                $thumb_resize_height,
                                function (Constraint $constraint) {
                                    $constraint->aspectRatio();
                                    if (isset($this->options->upsize) && !$this->options->upsize) {
                                        $constraint->upsize();
                                    }
                                }
                            );

                        if (isset($this->options->watermark) && $this->options->watermark) {
                            $image->insert($this->getWatermarkImage($thumb_resize_width), 'center');
                        }
                        

                        $image->encode($file_extension, $resize_quality);
                    } elseif (isset($thumbnails->crop->width) && isset($thumbnails->crop->height)) {
                        $crop_width = $thumbnails->crop->width;
                        $crop_height = $thumbnails->crop->height;

                        $image = InterventionImage::make($file)
                            ->orientate()
                            ->fit($crop_width, $crop_height);

                        if (isset($this->options->watermark) && $this->options->watermark) {
                            $image->insert($this->getWatermarkImage($crop_width), 'center');
                        }

                        $image->encode($file_extension, $resize_quality);
                    }

                    Storage::disk(config('voyager.storage.disk'))->put(
                        $path.$filename.'-'.$thumbnails->name.'.'.$file_extension,
                        (string) $image,
                        'public'
                    );
                }
            }

            return $fullPath;
        }
    }

    private function getFileName($file, $path, $file_extension)
    {
        if (isset($this->options->preserveFileUploadName) && $this->options->preserveFileUploadName) {
            $filename = basename($file->getClientOriginalName(), '.'.$file_extension);
            $filename_counter = 1;

            // Make sure the filename does not exist, if it does make sure to add a number to the end 1, 2, 3, etc...
            while (Storage::disk(config('voyager.storage.disk'))->exists($path.$filename.'.'.$file_extension)) {
                $filename = basename($file->getClientOriginalName(), '.'.$file_extension).(string) ($filename_counter++);
            }
        } else {
            $filename = Str::random(20);

            // Make sure the filename does not exist, if it does, just regenerate
            while (Storage::disk(config('voyager.storage.disk'))->exists($path.$filename.'.'.$file_extension)) {
                $filename = Str::random(20);
            }
        }

        if (isset($this->options->filename) && !empty($this->options->filename)){
            if ($_name = $this->request->input($this->options->filename)){
                $slugName = Str::slug($_name);
                $filename = $slugName;
                $filename_counter = 1;

                while (Storage::disk(config('voyager.storage.disk'))->exists($path.$filename.'.'.$file_extension)) {
                    $filename = basename($slugName, '.'.$file_extension).(string) ($filename_counter++);
                }
            }
        }

        return $filename;
    }

    private function getWatermarkImage ($imageWidth)
    {
        $scale = setting('site.wm_scale') !== '' ? setting('site.wm_scale') : config('app.watermark.scale', 0.5) ;
        $width = intval($imageWidth * $scale);
        $file_wm = Voyager::image(setting('site.watermark')) !== '' ? public_path('storage/'.setting('site.watermark')) : base_path().config('app.watermark.src');
        // check if watermark source is found.
        if ($file_wm)
        {
            $watermark = $file_wm;

            // if watermark source file is exists, execute
            if (file_exists($watermark))
            {
                //return InterventionImage::make($watermark)->resize(intval($imageWidth * $scale));
                return InterventionImage::make($watermark)->resize($width, null, function ($constraint) {
                    $constraint->aspectRatio();
                });
            }
        }

        // return empty watermark
        return InterventionImage::canvas($width, intval($width / 2));
    }

    private function is_animated_gif($filename)
    {
        $raw = file_get_contents($filename);

        $offset = 0;
        $frames = 0;
        while ($frames < 2) {
            $where1 = strpos($raw, "\x00\x21\xF9\x04", $offset);
            if ($where1 === false) {
                break;
            } else {
                $offset = $where1 + 1;
                $where2 = strpos($raw, "\x00\x2C", $offset);
                if ($where2 === false) {
                    break;
                } else {
                    if ($where1 + 8 == $where2) {
                        $frames++;
                    }
                    $offset = $where2 + 1;
                }
            }
        }

        return $frames > 1;
    }
}
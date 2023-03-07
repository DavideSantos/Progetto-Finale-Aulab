<?php

namespace App\Jobs;

use Spatie\Image\Image;
use Illuminate\Bus\Queueable;
use Spatie\Image\Manipulations;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Contracts\Queue\ShouldBeUnique;

class ResizeImage implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    private $w;
    private $h;
    private $fileName;
    private $path;
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($filePath, $w, $h)
    {
        $this->path=dirname($filePath);
        $this->fileName=basename($filePath);
        $this->w=$w;
        $this->h=$h;

    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $w=$this->w;
        $h=$this->h;
        $srcPath=storage_path() . '/app/public/' . $this->path . '/' . $this->fileName ;
        $destPath=storage_path() . '/app/public/' . $this->path . "/crop_{$w}x{$h}_" . $this->fileName ; 

        $croppedImage=Image::load($srcPath)
                    ->crop(Manipulations::CROP_CENTER , $w , $h)
                    ->fit(Manipulations::FIT_FILL, $w, $h)
                    ->watermark(base_path('resources/img/watermark.png'))
                    ->watermarkOpacity(50)
                    ->watermarkPadding(2, 2, Manipulations::UNIT_PERCENT) // 10% padding around the watermark
                    ->watermarkHeight(35, Manipulations::UNIT_PERCENT) //dove il numero nella parentesi la calcola in percentuale es. 20%
                    ->watermarkWidth(35, Manipulations::UNIT_PERCENT) //dove il numero nella parentesi la calcola in percentuale es. 20%
                    ->save($destPath);
    }
}

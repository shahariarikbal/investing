<?php

namespace App\Uploader;

use Intervention\Image\Facades\Image;

trait CropTrait
{
    public function cropOpenGraph()
    {
        Image::make($this->file_obj)->fit(1200, 630)->save($this->path . '/1200x630-' . $this->filename);
    }

    public function cropDetails()
    {
        Image::make($this->file_obj)->fit(940, 493)->save($this->path . '/940x493-' . $this->filename, $this->quality);
    }

    public function cropThumbnail()
    {
        Image::make($this->file_obj)->fit(220, 220)->save($this->path . '/220x220-' . $this->filename, $this->quality);
    }

    public function cropSmallThumbnail()
    {
        Image::make($this->file_obj)->fit(40, 40)->save($this->path . '/40x40-' . $this->filename, $this->quality);
    }

    public function cropCarousel()
    {
        Image::make($this->file_obj)->fit(278, 180)->save($this->path . '/278x180-' . $this->filename, $this->quality);
    }

    public function cropCurrency()
    {
        Image::make($this->file_obj)->fit(40, 15)->save($this->path . '/40x15-' . $this->filename, $this->quality);
    }

    public function cropBrokerScreenshot()
    {
        Image::make($this->file_obj)->fit(445, 261)->save($this->path . '/445x261-' . $this->filename, $this->quality);
    }

    public function cropBrokerLogoMd()
    {
        Image::make($this->file_obj)->fit(190, 65)->save($this->path . '/190x65-' . $this->filename, $this->quality);
    }

    public function cropBrokerLogoSm()
    {
        Image::make($this->file_obj)->fit(125, 56)->save($this->path . '/125x56-' . $this->filename, $this->quality);
    }

    public function cropBrokerLogoXs()
    {
        Image::make($this->file_obj)->fit(89, 36)->save($this->path . '/89x36-' . $this->filename, $this->quality);
    }

    public function cropAvaterSm()
    {
        Image::make($this->file_obj)->fit(100, 100)->save($this->path . '/100x100-' . $this->filename, $this->quality);
    }

    public function cropAvaterXs()
    {
        Image::make($this->file_obj)->fit(50, 50)->save($this->path . '/50x50-' . $this->filename, $this->quality);
    }
}

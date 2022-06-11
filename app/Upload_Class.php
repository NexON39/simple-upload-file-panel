<?php

namespace App;

class Upload
{
    public $FileDir = 'uploads/';
    public $FileToUpload;
    public $FileSource;
    public $FileType;
    public $UploadStatus = 1;

    // Upload status

    public function getUploadStatus()
    {
        return $this->UploadStatus;
    }

    // Get to upload from form

    public function setFileToUpload($file)
    {
        $this->FileToUpload = $file;
    }

    public function getFileToUpload()
    {
        return $this->FileToUpload;
    }

    // Full file source

    public function setFileSource()
    {
        $this->FileSource = $this->FileDir . basename($this->FileToUpload['name']);
    }

    public function getFileSource()
    {
        return $this->FileSource;
    }

    // File type

    public function setFileType()
    {
        $this->FileType = strtolower(pathinfo($this->FileSource, PATHINFO_EXTENSION));
    }

    public function getFileType()
    {
        return $this->FileType;
    }

    // Check if file exist
    public function checkFileExist()
    {
        if (file_exists($this->FileSource)) {
            $this->UploadStatus = 0;
        }
    }

    // Check file format
    public function checkFileFormat()
    {
        if ($this->FileType != 'rar') {
            $this->UploadStatus = 0;
        }
    }

    public function upload()
    {
        if ($this->UploadStatus == 0) {
            return 'Such file already exists or is not in rar format';
        } else {
            if (move_uploaded_file($this->FileToUpload['tmp_name'], $this->FileSource)) {
                return 'File ' . htmlspecialchars(basename($this->FileToUpload['name'])) . ' has been uploaded.';
            } else {
                return 'Error';
            }
        }
    }
}

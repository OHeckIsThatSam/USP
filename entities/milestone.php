<?php

class milestone {

   private $id;
   private $userid;
   private $title;
   private $education;
   private $job;
   private $course;
   private $achieved;
   private $comment;

   public function getId(){
       return $this->id;
   }

   public function setId(){
       $this ->id;
   }

   public function getUserId(){
       return $this->userid;   
    }

    public function setUserId(){
        $this->userid;
    }

    public function getTitle(){
        return $this->title;
    }

    public function setTitle(){
        $this->title;
    }

    public function getEducation(){
        return $this->education;
    }

    public function setEducation(){
        $this->education;
    }

    public function getJob(){
        return $this->job;
    }

    public function setJob(){
        $this->job;
    }

    public function getCourse(){
        return $this->course
    }

    public function setCourse(){
        $this->course;
    }

    public function getAchieved(){
        return $this->achieved;
    }

    public function setAchieved(){
        $this->achieved;
    }

    public function getComment(){
        return $this->comment;
    }

    public function setComment(){
        $this->comment;
    }

}
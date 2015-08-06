<?php
    class JobOpening
    {
        private $title;
        private $description;
        private $contact;

        function __construct($new_title, $new_description, $new_contact)
        {
            $this->title = $new_title;
            $this->description = $new_description;
            $this->contact = $new_contact;
        }

        function setTitle($new_title)
        {
            $this->title = $new_title;
        }

        function getTitle()
        {
            return $this->title;
        }

        function setDescription($new_description)
        {
            $this->description = $new_description;
        }

        function getDescription()
        {
            return $this->description;
        }

        function setContact($new_contact)
        {
            $this->contact = $new_contact;
        }

        function getContact()
        {
            return $this->contact;
        }

    }


?>

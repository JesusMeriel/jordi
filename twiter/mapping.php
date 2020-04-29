<?php


class LogData extends DataBoundObject {

        protected $date;
        protected $url;
        protected $image;
        protected $twit;

        protected function DefineTableName() {
                return("twitter");
        }

        protected function DefineRelationMap() {
                return(array(
                		"id" => "ID",
                        "date" => "date",
                        "url" => "url",
                        "image" => "image",
                        "twit" => "twit"
                        ));
        }
}

?>

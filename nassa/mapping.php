<?php


class LogData extends DataBoundObject {

        protected $count;
        protected $source;
        protected $version;

        protected function DefineTableName() {
                return('Nasa');
        }

        protected function DefineRelationMap() {
                return(array(
                	       "id" => "ID",
                        "count" => "count",
                        "source" => "source",
                        "version" => "version",
                        ));
        }
}

?>

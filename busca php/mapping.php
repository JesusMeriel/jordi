<?php


class LogData extends DataBoundObject {

        protected $palabra;
        protected $total;
        protected $lastvisit;

        protected function DefineTableName() {
                return('bsc');
        }

        protected function DefineRelationMap() {
                return(array(
                	       "id" => "ID",
                        "palabra" => "palabra",
                        "total" => "total",
                        "lastvisit" => "lastvisit",
                        ));
        }
}

?>

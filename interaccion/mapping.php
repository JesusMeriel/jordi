<?php


class LogData extends DataBoundObject {

        protected $to_user_id;
        protected $from_user_id;
        protected $chat_message;
        protected $status;

        protected function DefineTableName() {
                return('chat_message');
        }

        protected function DefineRelationMap() {
                return(array(
                	       "to_user_id" => "ID",
                        "from_user_id" => "from_user_id",
                        "chat_message" => "chat_message",
                        "status" => "status",
                        ));
        }
}

?>

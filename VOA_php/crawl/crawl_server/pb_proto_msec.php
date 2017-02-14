<?php
class OneMP3 extends PBMessage
{
  var $wired_type = PBMessage::WIRED_LENGTH_DELIMITED;
  public function __construct($reader=null)
  {
    parent::__construct($reader);
    $this->fields["1"] = "PBString";
    $this->values["1"] = "";
    $this->fields["2"] = "PBString";
    $this->values["2"] = "";
  }
  function title()
  {
    return $this->_get_value("1");
  }
  function set_title($value)
  {
    return $this->_set_value("1", $value);
  }
  function url()
  {
    return $this->_get_value("2");
  }
  function set_url($value)
  {
    return $this->_set_value("2", $value);
  }
}
class GetMP3ListRequest extends PBMessage
{
  var $wired_type = PBMessage::WIRED_LENGTH_DELIMITED;
  public function __construct($reader=null)
  {
    parent::__construct($reader);
    $this->fields["1"] = "PBString";
    $this->values["1"] = "";
  }
  function type()
  {
    return $this->_get_value("1");
  }
  function set_type($value)
  {
    return $this->_set_value("1", $value);
  }
}
class GetMP3ListResponse extends PBMessage
{
  var $wired_type = PBMessage::WIRED_LENGTH_DELIMITED;
  public function __construct($reader=null)
  {
    parent::__construct($reader);
    $this->fields["1"] = "OneMP3";
    $this->values["1"] = array();
    $this->fields["2"] = "PBInt";
    $this->values["2"] = "";
    $this->fields["3"] = "PBString";
    $this->values["3"] = "";
  }
  function mp3s($offset)
  {
    return $this->_get_arr_value("1", $offset);
  }
  function add_mp3s()
  {
    return $this->_add_arr_value("1");
  }
  function set_mp3s($index, $value)
  {
    $this->_set_arr_value("1", $index, $value);
  }
  function remove_last_mp3s()
  {
    $this->_remove_last_arr_value("1");
  }
  function mp3s_size()
  {
    return $this->_get_arr_size("1");
  }
  function status()
  {
    return $this->_get_value("2");
  }
  function set_status($value)
  {
    return $this->_set_value("2", $value);
  }
  function msg()
  {
    return $this->_get_value("3");
  }
  function set_msg($value)
  {
    return $this->_set_value("3", $value);
  }
}
?>
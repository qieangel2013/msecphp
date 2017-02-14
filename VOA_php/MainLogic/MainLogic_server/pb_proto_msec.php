<?php
class GetTitlesRequest extends PBMessage
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
class GetTitlesResponse extends PBMessage
{
  var $wired_type = PBMessage::WIRED_LENGTH_DELIMITED;
  public function __construct($reader=null)
  {
    parent::__construct($reader);
    $this->fields["1"] = "PBString";
    $this->values["1"] = array();
    $this->fields["2"] = "PBInt";
    $this->values["2"] = "";
    $this->fields["3"] = "PBString";
    $this->values["3"] = "";
  }
  function titles($offset)
  {
    $v = $this->_get_arr_value("1", $offset);
    return $v->get_value();
  }
  function append_titles($value)
  {
    $v = $this->_add_arr_value("1");
    $v->set_value($value);
  }
  function set_titles($index, $value)
  {
    $v = new $this->fields["1"]();
    $v->set_value($value);
    $this->_set_arr_value("1", $index, $v);
  }
  function remove_last_titles()
  {
    $this->_remove_last_arr_value("1");
  }
  function titles_size()
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
class GetUrlByTitleRequest extends PBMessage
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
  function type()
  {
    return $this->_get_value("1");
  }
  function set_type($value)
  {
    return $this->_set_value("1", $value);
  }
  function title()
  {
    return $this->_get_value("2");
  }
  function set_title($value)
  {
    return $this->_set_value("2", $value);
  }
}
class GetUrlByTitleResponse extends PBMessage
{
  var $wired_type = PBMessage::WIRED_LENGTH_DELIMITED;
  public function __construct($reader=null)
  {
    parent::__construct($reader);
    $this->fields["1"] = "PBString";
    $this->values["1"] = "";
    $this->fields["2"] = "PBInt";
    $this->values["2"] = "";
    $this->fields["3"] = "PBString";
    $this->values["3"] = "";
  }
  function url()
  {
    return $this->_get_value("1");
  }
  function set_url($value)
  {
    return $this->_set_value("1", $value);
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
class DownloadMP3Request extends PBMessage
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
  function type()
  {
    return $this->_get_value("1");
  }
  function set_type($value)
  {
    return $this->_set_value("1", $value);
  }
  function title()
  {
    return $this->_get_value("2");
  }
  function set_title($value)
  {
    return $this->_set_value("2", $value);
  }
}
class DownloadMP3Response extends PBMessage
{
  var $wired_type = PBMessage::WIRED_LENGTH_DELIMITED;
  public function __construct($reader=null)
  {
    parent::__construct($reader);
    $this->fields["1"] = "PBInt";
    $this->values["1"] = "";
    $this->fields["2"] = "PBString";
    $this->values["2"] = "";
    $this->fields["3"] = "PBInt";
    $this->values["3"] = "";
    $this->fields["4"] = "PBString";
    $this->values["4"] = "";
  }
  function status()
  {
    return $this->_get_value("1");
  }
  function set_status($value)
  {
    return $this->_set_value("1", $value);
  }
  function msg()
  {
    return $this->_get_value("2");
  }
  function set_msg($value)
  {
    return $this->_set_value("2", $value);
  }
  function file_len()
  {
    return $this->_get_value("3");
  }
  function set_file_len($value)
  {
    return $this->_set_value("3", $value);
  }
  function file_content()
  {
    return $this->_get_value("4");
  }
  function set_file_content($value)
  {
    return $this->_set_value("4", $value);
  }
}
?>
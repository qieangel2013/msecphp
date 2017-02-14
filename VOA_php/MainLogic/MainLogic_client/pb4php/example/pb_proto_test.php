<?php
class playerLoginRequest extends PBMessage
{
  var $wired_type = PBMessage::WIRED_LENGTH_DELIMITED;
  public function __construct($reader=null)
  {
    parent::__construct($reader);
    $this->fields["1"] = "PBString";
    $this->values["1"] = "";
    $this->fields["2"] = "PBString";
    $this->values["2"] = "";
    $this->fields["3"] = "PBInt";
    $this->values["3"] = "";
  }
  function account()
  {
    return $this->_get_value("1");
  }
  function set_account($value)
  {
    return $this->_set_value("1", $value);
  }
  function pwd()
  {
    return $this->_get_value("2");
  }
  function set_pwd($value)
  {
    return $this->_set_value("2", $value);
  }
  function id()
  {
    return $this->_get_value("3");
  }
  function set_id($value)
  {
    return $this->_set_value("3", $value);
  }
}
?>
<?php
// Generated by https://github.com/bramp/protoc-gen-php// Please include protocolbuffers before this file, for example:
//   require('protocolbuffers.inc.php');
//   require('POGOProtos/Networking/Requests/Messages/SetContactSettingsMessage.php');

namespace POGOProtos\Networking\Requests\Messages {

  use POGOProtos\Data\Player\ContactSettings;
  use Protobuf;
  use ProtobufIO;
  use ProtobufMessage;


  // message POGOProtos.Networking.Requests.Messages.SetContactSettingsMessage
  final class SetContactSettingsMessage extends ProtobufMessage {

    private $_unknown;
    private $contactSettings = null; // optional .POGOProtos.Data.Player.ContactSettings contact_settings = 1

    public function __construct($in = null, &$limit = PHP_INT_MAX) {
      parent::__construct($in, $limit);
    }

    public function read($fp, &$limit = PHP_INT_MAX) {
      $fp = ProtobufIO::toStream($fp, $limit);
      while(!feof($fp) && $limit > 0) {
        $tag = Protobuf::read_varint($fp, $limit);
        if ($tag === false) break;
        $wire  = $tag & 0x07;
        $field = $tag >> 3;
        switch($field) {
          case 1: // optional .POGOProtos.Data.Player.ContactSettings contact_settings = 1
            if($wire !== 2) {
              throw new \Exception("Incorrect wire format for field $field, expected: 2 got: $wire");
            }
            $len = Protobuf::read_varint($fp, $limit);
            if ($len === false) throw new \Exception('Protobuf::read_varint returned false');
            $limit -= $len;
            $this->contactSettings = new ContactSettings($fp, $len);
            if ($len !== 0) throw new \Exception('new \POGOProtos\Data\Player\ContactSettings did not read the full length');

            break;
          default:
            $limit -= Protobuf::skip_field($fp, $wire);
        }
      }
    }

    public function write($fp) {
      if ($this->contactSettings !== null) {
        fwrite($fp, "\x0a", 1);
        Protobuf::write_varint($fp, $this->contactSettings->size());
        $this->contactSettings->write($fp);
      }
    }

    public function size() {
      $size = 0;
      if ($this->contactSettings !== null) {
        $l = $this->contactSettings->size();
        $size += 1 + Protobuf::size_varint($l) + $l;
      }
      return $size;
    }

    public function clearContactSettings() { $this->contactSettings = null; }
    public function getContactSettings() { return $this->contactSettings;}
    public function setContactSettings(ContactSettings $value) { $this->contactSettings = $value; }

    public function __toString() {
      return ''
           . Protobuf::toString('contact_settings', $this->contactSettings, null);
    }

    // @@protoc_insertion_point(class_scope:POGOProtos.Networking.Requests.Messages.SetContactSettingsMessage)
  }

}
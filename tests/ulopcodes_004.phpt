--TEST--
Check emitting a function call
--INI--
ulopcodes.enabled = 1
ulopcodes.dump_oparray = 0
--FILE--
<?php 

function getGreeting() {
    ulopcodes_emit(ZEND_RETURN, "Hello world!");
}

ulopcodes_emit(ZEND_INIT_FCALL, NULL, "getgreeting");
$greeting = ulopcodes_emit(ZEND_DO_FCALL);

ulopcodes_emit(ZEND_ECHO, $greeting);

?>
--XFAIL--
Bug when calling user functions https://github.com/pmmaga/php-ulopcodes/issues/3
--EXPECT--
Hello world!

# Legacy CMS
## config class
### Configuration managment engine

This class is responsible to manage configuration stored in .cfg files .

Default location for config  files is /cfg/config/.
There can be multiple .cfg  files in this location.  

```
VALUE1=TEST
VALUE2=TEST2
BOOL=TAK
BOOL2=BLEE
```

now in  your Application 

```
$config=new Config();
$value1=$config->get('VALUE1');  //return TEST
$value2=$config->get('BOOL');  //return true (as string)
$value3=$config->check('BOOL');  //return true
$value4=$confg->check('BOOL2'); //return false

```

get ()  retun values of parameter.
check() check if value is  'TAK' - if yes return true.

[Back to index](../README.md)
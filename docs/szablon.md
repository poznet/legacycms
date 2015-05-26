# Legacy CMS
## szablon class
### Simple template engine

This engine  using text files with extension .tpl  with syntax 
{name}  as a value that should be replaced by engine.

Engine  search tpl files  in  'tpl' directory in main localization.

###How to use

```
$template=new Szablon('main.tpl')
$template->add('name','value');
echo $template->show();
```

In  gven example engine opens  file tpl/main.tpl  and replaces "{name}" with "value".


Only problem is  that you can't  use  "{" , "}"  directly in tpl .






[Back to index](../README.md)
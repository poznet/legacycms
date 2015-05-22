# Legacy CMS

Simple legacy  CMS form  old projects 

**Szablon**
Usage: 

1.Create  object,  with template file as constructor  parametr 
  

     $tpl=new szablon('main.tpl');    // main.tpl need to be in tpl folder

2.Add variables(content) to template

    $tpl->add('name','value');        //you need to have {name}  in template

3.Show template

    echo $tpl->show();



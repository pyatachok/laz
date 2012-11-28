 function showPic(picture,title,width,height)
{
   newWindow = window.open('','newWindow','width='+width+',height='+height+',top='+document.body.clientHeight/4+',left='+document.body.clientWidth/6);
   newWindow.document.open();
   newWindow.document.write('<html><head><title>'+title+'</title>');
   newWindow.document.write('</head><body leftmargin="0" topmargin="0" marginheight="0" marginwidth="0">');
   newWindow.document.write('<img src="'+picture+'" width="'+width+'" height="'+height+'">');
   newWindow.document.write('</body></html>');
   newWindow.document.close();
  newWindow.focus();   
}

function view(url,width,height)
{ 
  newWindow = window.open(url,'view','toolbar=no,location=no,menubar=no,width='+width+',height='+height+',top='+document.body.clientHeight/9+',left='+document.body.clientWidth/5);
  newWindow.focus();
}

function view_cart(url)
{ 
  newWindow = window.open(url,'view','toolbar=no,location=no,status=yes,menubar=no,scrollbars=yes,width=620,height=400,resizable=yes,top='+((document.body.clientHeight/2)-200)+',left='+((document.body.clientWidth/2)-310));
  //alert (document.body.clientWidth/2+','+document.body.clientHeight/2 );
  newWindow.focus();
}

function view_colors(url)
{ 
  newWindow = window.open(url,'view','toolbar=no,location=no,status=yes,menubar=no,scrollbars=yes,width=200,height=250,resizable=yes,top='+((document.body.clientHeight/2)-125)+',left='+((document.body.clientWidth/2)-100));
  newWindow.focus();
}
/* A simple content module for loading a local html file */
function html_menuitem(args) {
  return "javascript:html_load('"+args+"');";
}

function html_display(content) {
  content = '<article>'+content+'</article>';
  $('#contentArea').html(content);
}
function html_load(file) {
  // File may or may not be contained in a JSON string and array. Strip uneeded characters
  file = file.replace(/"/g,'');
  file = file.replace(/\[/g,'');
  file = file.replace(/\]/g,'');

  //sanitise file to prevent it reaching parent directory
  file = file.replace("..",'');

  //do pushState before we add the folder name
  pushStateWithoutDuplicate(file, './?p=html/'+file);

  //if hostname is set, check the correct folder for content
  if(hostname != '') file = hostname+'/'+file;

  $.ajax({
      type: 'GET',
      url: "content/"+file
  }).done(html_display);
}
function html_permlink(permlink) {
  permlink = permlink.join("/");
  html_load(permlink);
}


$(document).ready(function() {
  $(".panel-toggler").on("click", function(event) {
    event.preventDefault();
    $("body").toggleClass("has-active-panel");
  });

  const editor = pell.init({
    element: document.getElementsByClassName('text-editor')[0],
    onChange: html => {
      console.log(html);
    },
    styleWithCSS: true,
    actions: [
      'bold',
      'underline',
      'italic',
      {
        name: 'custom',
        icon: '<b><u><i>C</i></u></b>',
        title: 'Custom Action',
        result: () => console.log('YOLO')
      },
      {
        name: 'image',
        result: () => {
          const url = window.prompt('Enter the image URL')
          if (url) window.pell.exec('insertImage', url)
        }
      },
      {
        name: 'link',
        result: () => {
          const url = window.prompt('Enter the link URL')
          const text = window.prompt('Enter the text for this URL')

          window.pell.exec('insertHTML', '<a href="' + url + '" target="_blank">' + text + '</a>');


          //if (url) window.pell.exec('createlink', url)

        }
      }
    ],
    classes: {
      actionbar: 'w-100 text-editor-toolbar btn-group',
      button: 'btn rounded-0',
      content: 'text-editor-content px-3 py-2'
    }
  })


  editor.content.innerHTML = "<p>Write something&hellip;</p>"
});

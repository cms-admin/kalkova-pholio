+function($){
  /**
   * Селекты на страницах редактирования контента
   */
  if (isset('.ft_list')) {
    $('.ft_list').niceSelect();
  }
  if (isset('.field.ft_date select')) {
    $('.field.ft_date select').niceSelect();
  }

  /* iOS switches */
  if (isset('.ui-dash__form .input-checkbox')) {
    var elems = Array.prototype.slice.call(document.querySelectorAll('.ui-dash__form .input-checkbox'));

    elems.forEach(function(html) {
      var switchery = new Switchery(html, {secondaryColor: '#d6d6d6', size: 'small'});
    });
  }
}(jQuery);

/**
 * Проверяет наличие элемента на странице
 * @param {string} el селектор искомого элемента
 */
function isset(el){
  var obj = $(document).has(el);

  return (obj.length == 0) ? false : true;
}
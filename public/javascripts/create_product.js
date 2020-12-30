
$(document).ready(function () {
  function updateCategories() {

          var categorySelect = $('#category');
          var el = $('#subCategory');
          var selectedCategoryOption = categorySelect.find(":selected");
          var categoryId = selectedCategoryOption.attr('data-category');

            $.each(el.children(), function (index, element) {
                element = $(element);
                if (element.attr('data-category') !== categoryId) {
                  if(element.attr('data-category') != 0)
                  {
                    element.hide();
                  }

                } else
                {
                    element.show();
                }
            });
            $("#subCategory").val(0);
        }


  $(document).on('change', '#category', function (e) {
    updateCategories();
  });

  updateCategories();
})

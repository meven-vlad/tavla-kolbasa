this.Kidrest = this.Kidrest || {};
(function (exports) {
    'use strict';

    var FormFooter = /*#__PURE__*/function () {
      function FormFooter() {
        babelHelpers.classCallCheck(this, FormFooter);
        this.initHandleForm();
      }

      babelHelpers.createClass(FormFooter, [{
        key: "initHandleForm",
        value: function initHandleForm() {
          $(document).on('submit', '.ajax-form', function (e) {
            e.preventDefault();
            var form = $(this);
            var data = form.serialize();
            $.ajax({
              url: '/local/ajax/form/request.php',
              method: 'POST',
              data: data
            }).done(function (e) {
              form.html(e);
            });
          });
        }
      }]);
      return FormFooter;
    }();

    exports.FormFooter = FormFooter;

}((this.Kidrest.Components = this.Kidrest.Components || {})));
//# sourceMappingURL=app.bundle.js.map

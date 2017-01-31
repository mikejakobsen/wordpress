const AdminLogin = {
  init() {
    $(document).ready(() => {
      // temp - set placeholder with JS
      $('#user_login').attr('placeholder', 'Username or Email');
      $('#user_pass').attr('placeholder', 'Password');

      // temp - hacky JS to fix the markup
      const loginFormHtml = $('#loginform').html();
      const brRegex = /<br\s*[/]?>/gi;
      const labelCloseRegex = /<\/label>/g;
      $('#loginform').html(loginFormHtml.replace(labelCloseRegex, ''));
      $('#loginform').html(loginFormHtml.replace(brRegex, '</label>'));

      // toggle p class
      $('#loginform p').each((index, element) => {
        const wrap = $(element);
        const field = wrap.find('input');

        // when we have a value
        field.on('keyup focus blur', () => {
          if (field.val().length > 0) {
            wrap.addClass('js--filled');
          } else {
            wrap.removeClass('js--filled');
          }
        });

        // also toggle class if we have data prefilled
        if (field.val().length > 0) {
          wrap.addClass('js--filled');
        } else {
          wrap.removeClass('js--filled');
        }
      });
    });
  },
};

module.exports = AdminLogin;

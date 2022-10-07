$(function () {
  $('#frmLogin').on('submit', function (event) {
    event.preventDefault();
    console.log('Login');
    console.log($(this).serialize());
    $.post('index.php', $(this).serialize());
  });

  $('#frmPreferences').on('submit', () => {
    console.log('Preferences');
  });

  $('#frmCreateUser').on('submit', () => {
    console.log('Create User');
  });

  $('#frmChangePassword').on('submit', () => {
    console.log('Change Password');
  });
});


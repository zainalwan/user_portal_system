/*
|--------------------------------------------------------------------------
| LICENSE
|--------------------------------------------------------------------------
| Code that written below is belong to Zain Alwan Wima Irfani. You may
| not use, share, modify, and study without the author's permission
| (zainalwan4@gmail.com).
*/

let PasswordField = function() {
    this.passwordField = document.getElementById('password')
                      || document.getElementById('new_password');
    this.showIcon = document.getElementsByClassName('show-icon')[0];
    this.hideIcon = document.getElementsByClassName('hide-icon')[0];

    this.showPassword = () => {
        this.passwordField.setAttribute('type', 'password');
        this.showIcon.style.display = 'none';
        this.hideIcon.style.display = 'block';
    }

    this.hidePassword = () => {
        this.passwordField.setAttribute('type', 'text');
        this.showIcon.style.display = 'block';
        this.hideIcon.style.display = 'none';
    }

    this.startJob = () => {
        this.showIcon.addEventListener('click', this.showPassword);
	this.hideIcon.addEventListener('click', this.hidePassword);
    }
}

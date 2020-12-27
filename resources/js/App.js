/*
|--------------------------------------------------------------------------
| LICENSE
|--------------------------------------------------------------------------
| Code that written below is belong to Zain Alwan Wima Irfani. You may
| not use, share, modify, and study without the author's permission
| (zainalwan4@gmail.com).
*/

let App = function() {
    this.passwordField = new PasswordField();

    this.run = () => {
        this.passwordField.startJob();
    }
}

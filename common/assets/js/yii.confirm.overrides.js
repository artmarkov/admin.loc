/**
 * Created by Артур on 03.06.2018.
 */
yii.confirm = function(message, ok, cancel) {
    bootbox.confirm(message, function(result) {
        if (result) { !ok || ok(); } else { !cancel || cancel(); }
    });
}
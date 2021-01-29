// *************************************************
// スマホ用ナビメニューの開閉
//（Vueでは、「メニュー以外を押すと閉じる」機能が実装できないため、通常のjsで対応）
// *************************************************
window.addEventListener('DOMContentLoaded', () => {
    const click = document.querySelector('.js-settings-click');
    const items = document.getElementsByClassName('js-settings-item');

    click.addEventListener('click', e => {
        e.stopPropagation();
        console.log('click');

        for (let i = 0; i < items.length; i++) {
            items[i].classList.toggle('is-active');
        }
    });
});

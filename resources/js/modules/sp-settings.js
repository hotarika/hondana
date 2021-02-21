// *************************************************
// スマートフォンの設定メニューをアコーディオンで実装
// *************************************************
window.addEventListener('DOMContentLoaded', () => {
    const click = document.querySelector('.js-settings-click');
    const items = document.getElementsByClassName('js-settings-item');

    if (click && items) {
        // メニューをtoggle
        click.addEventListener('click', e => {
            e.stopPropagation();
            console.log('click');

            for (let i = 0; i < items.length; i++) {
                items[i].classList.toggle('is-active');
            }
        });

        // メニューの外側を押して閉じる
        document.addEventListener('click', e => {
            if (
                !e.target.closest('.js-settings-click') &&
                !e.target.closest('.js-settings-item')
            ) {
                for (let i = 0; i < items.length; i++) {
                    items[i].classList.remove('is-active');
                }
            }
        });
    }
});

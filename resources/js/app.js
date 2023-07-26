import Alpine from 'alpinejs'
import Focus from '@alpinejs/focus'
import FormsAlpinePlugin from '../../vendor/filament/forms/dist/module.esm'
import NotificationsAlpinePlugin from '../../vendor/filament/notifications/dist/module.esm'

Alpine.plugin(Focus)
Alpine.plugin(FormsAlpinePlugin)
Alpine.plugin(NotificationsAlpinePlugin)

window.Alpine = Alpine

Alpine.start()
document.addEventListener("DOMContentLoaded", () => {
    const chessboard = document.getElementById("chessboard");

    for (let row = 1; row <= 8; row++) {
        for (let col = 1; col <= 8; col++) {
            const square = document.createElement("div");
            square.classList.add("square");
            square.setAttribute("data-row", row);
            square.setAttribute("data-col", col);
            chessboard.appendChild(square);
        }
    }
});


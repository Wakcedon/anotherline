document.addEventListener("DOMContentLoaded", function() {
    const statsContainer = document.getElementById('stats');
    
    // Здесь можно подключить реальный API для получения данных
    fetch('api/statistics')
        .then(response => response.json())
        .then(data => {
            // Пример обновления статистики
            statsContainer.innerHTML = `
                <p>Количество треков: ${data.tracks}</p>
                <p>Количество артистов: ${data.artists}</p>
                <p>Общее количество прослушиваний: ${data.totalPlays}</p>
            `;
        })
        .catch(error => {
            statsContainer.innerHTML = `<p>Не удалось загрузить данные. Попробуйте позже.</p>`;
        });
});

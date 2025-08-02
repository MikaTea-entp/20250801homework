<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title>My Favorite Things</title>
    <script src="https://code.jquery.com/jquery-2.1.3.min.js"></script>
    <link rel="icon" href="../../pictures/favicon.ico" rel="shortcut icon" type="image/x-icon">
    <style>/* journalから基本的には流用 */
    body {
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        background-color: #f7f7f7;
        color: #333;
        line-height: 1.6;
        margin: 0;
        padding: 2rem;
    }
    h1, h2, h3 {
        color: #222;
    }
    blockquote {
        border-left: 4px solid #999;
        padding-left: 1rem;
        color: #666;
        font-style: italic;
    }
    code {
        background: #eee;
        padding: 2px 4px;
        border-radius: 4px;
    }
    .section {
        background: rgba(255, 255, 255, 0.85); /* 背景のみ透明 */
        padding: 2rem;
        margin-bottom: 2rem;
        border-radius: 8px;
        box-shadow: 0 0 10px rgba(0,0,0,0.05);
    }
    ul {
        padding-left: 1.5rem;
    }
    a {
        color: #0366d6;
        text-decoration: none;
    }
    a:hover {
        text-decoration: underline;
    }
    footer {
        text-align: center;
        font-size: 0.9rem;
        color: #f7f7f7;
        margin-top: 4rem;
    }
    body {
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        background: url("../../pictures/dublin.jpg") center center / cover no-repeat fixed;
        color: #333;
        line-height: 1.6;
        margin: 0;
        padding: 2rem;
    }
    .input-area {
        display: flex;
        flex-direction: column;
        gap: 1rem;
        margin-top: 1rem;
    }
    .input-area input,
    .input-area textarea {
        width: 100%;
        font-size: 1rem;
        padding: 0.75rem;
        border: 1px solid #ccc;
        border-radius: 6px;
        box-sizing: border-box;
        background: #fff;
    }

/* ===== スマホ対応レスポンシブ追加 ===== */
    @media (max-width: 600px) {
        body {
            padding: 0.5rem;
            line-height: 1.45; /* 文字多いのでちょい詰め */
        }
        .section {
            padding: 0.7rem 0.6rem;
            margin-bottom: 1rem;
            border-radius: 6px;
            max-width: 98vw;      /* 文字多いので横幅詰め */
        }
        .section p, .section ul, .section blockquote {
            font-size: 0.98rem;
            line-height: 1.45;
            letter-spacing: 0.01em;
            word-break: break-word;
            margin-bottom: 0.8em;
            max-width: 38em;     /* 1行の最大文字数を制限 */
        }
        h1 { font-size: 1.35rem; }
        h2 { font-size: 1.07rem; }
        h3 { font-size: 0.95rem; }
        .input-area input,
        .input-area textarea {
            font-size: 0.98rem;
            padding: 0.5rem;
        }
        button {
            font-size: 1.02rem;
            padding: 0.7rem;
            border-radius: 7px;
            width: 100%;
        }
        footer {
            font-size: 0.75rem;
            padding: 1rem 0;
        }
    }

    .favs-entry {
        background: rgba(255, 255, 255, 0.92);
        border-radius: 12px;
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.08);
        padding: 1.5rem;
        margin-bottom: 1.5rem;
        transition: box-shadow 0.3s ease;
    }
    .favs-entry:hover {
        box-shadow: 0 6px 20px rgba(0, 0, 0, 0.12);
    }
    .favs-entry textarea {
        width: 100%;
        min-height: 140px;
        font-size: 1rem;
        padding: 0.75rem;
        border: 1px solid #ccc;
        border-radius: 8px;
        resize: vertical;
        box-sizing: border-box;
        background-color: #fff;
        margin-top: 0.5rem;
        margin-bottom: 0.5rem;
    }
    </style>
</head>

<body>
<div class="section">
    <h1>好きなものノート / My Favorite Things</h1>
    <blockquote>
        “Tell me what you love, and I will tell you who you are.”<br/>
        ― Jean-Paul Sartre
    </blockquote>
    <blockquote>
        “Collect things you love, and you’ll collect yourself.”<br/>
        ― Austin Kleon
    </blockquote>
</div>

<div class="section">
    <p>このページは、あなたの「好きなものノート」。<br/>
        日々の中で出会った「ワクワク」や「ときめき」を、自由に書き残す場所です。<br/>
        「くだらないかな」と思うことでも、それはあなたにとって大切なヒントかもしれません。<br/>
    <br/>
        「課題」とは「As-Is（理想）」と「To-Be（現状）」のギャップ。<br/>
        そのギャップを埋めるための「好きなもの」を見つけることが、未来をつくる第一歩です。<br/>
        何度も好きになるもの、昔から変わらず惹かれるもの。<br/>
        そんな記録が、あなた自身をつくり、未来の方向を照らします。</p>
</div>

<div class="section">
    <h2>🌈 今日の「好きなもの」を書いてみよう</h2>
    <ul>
        <li>最近ときめいたもの・人・場所・ことは何ですか？</li>
        <li>それは、なぜあなたの心を動かしましたか？</li>
        <li>昔から変わらず好きなものは？理由は？</li>
    </ul>
    <p>気軽に、思いつくままに。書くこと自体が、未来をつくる一歩です。</p>
    <div class="input-area">
        <input id="favs-title" type="text" placeholder="タイトルを入力してください..." />
        <textarea id="favs-text" rows="10" placeholder="ここにあなたの“好き”を書いてください..."></textarea>
        <button id="submit-favs">ノートを保存</button>
    </div>
</div>

<div class="section">
    <h2>📚 保存されたノート一覧</h2>
    <div id="favs-list"></div>
</div>

<script>
document.getElementById('submit-favs').addEventListener('click', function () {
    const title = document.getElementById('favs-title').value.trim();
    const text = document.getElementById('favs-text').value.trim();

    if (!title || !text) {
        alert('タイトルと本文を入力してください。');
        return;
    }

    $.post('save_favs.php', { title, content: text }, function() {
        alert('お気に入りを宝箱に入れました！');
        document.getElementById('favs-title').value = '';
        document.getElementById('favs-text').value = '';
        displaySavedFavs();
    }).fail(function() {
        alert('保存に失敗しました');
    });
});

function displaySavedFavs() {
    const listContainer = document.getElementById('favs-list');
    listContainer.innerHTML = '';

    $.getJSON('https://mikatea.sakura.ne.jp/ADeLE/favs/get_favs.php', function(data) {
        if (!data.length) {
            listContainer.innerHTML = '<p>保存されたノートはありません。</p>';
            return;
        }

        data.forEach(item => {
            const entry = document.createElement('div');
            entry.className = 'favs-entry';
            entry.dataset.id = item.id;
            entry.innerHTML = `
                <h3>${item.title} <span style="font-size:0.8em;color:#888;">(${item.created_at})</span></h3>
                <textarea disabled>${item.content}</textarea><br>
                <button class="edit-btn">編集</button>
                <button class="update-btn" style="display:none;">更新</button>
                <button onclick="deletefavs(${item.id})">🗑 削除</button>
                <hr/>
            `;
        
            listContainer.appendChild(entry);

            const editBtn = entry.querySelector('.edit-btn');
            const updateBtn = entry.querySelector('.update-btn');
            const textarea = entry.querySelector('textarea');

            editBtn.addEventListener('click', () => {
                textarea.disabled = false;
                textarea.focus();
                editBtn.style.display = 'none';
                updateBtn.style.display = 'inline-block';
            });

            updateBtn.addEventListener('click', () => {
                const newContent = textarea.value;
                fetch('https://mikatea.sakura.ne.jp/ADeLE/favs/update_favs.php', {
                    method: 'POST',
                    headers: { 'Content-Type': 'application/x-www-form-urlencoded' },
                    body: `id=${encodeURIComponent(item.id)}&content=${encodeURIComponent(newContent)}`
                }).then(res => res.text()).then(data => {
                    alert('更新しました！');
                    textarea.disabled = true;
                    updateBtn.style.display = 'none';
                    editBtn.style.display = 'inline-block';
                }).catch(err => alert('更新に失敗しました。'));
            });
        });
    });
}            

function deletefavs(id) {
    if (confirm('本当に削除しますか？')) {
        $.post('delete_favs.php', { id }, function() {
            displaySavedfavs();
        });
    }
}

window.addEventListener('DOMContentLoaded', displaySavedFavs);
</script>

</body>
</html>

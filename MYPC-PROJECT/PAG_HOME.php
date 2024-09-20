/* Geral */
body {
    font-family: 'Poppins', sans-serif;
    background-color: #121212;
    color: #f2f2f2;
    margin: 0;
    padding: 0;
    overflow-x: hidden;
}

/* Header */
header {
    background-color: #1f1f1f;
    padding: 15px 0;
    box-shadow: 0 2px 5px rgba(0, 0, 0, 0.2);
    position: sticky;
    top: 0;
    z-index: 1000;
}

.container {
    max-width: 1200px;
    margin: 0 auto;
    padding: 0 20px;
    display: flex;
    align-items: center;
    justify-content: space-between;
}

h1 {
    font-size: 24px;
    color: #d8a42c;
    margin: 0;
}

nav ul {
    list-style: none;
    margin: 0;
    padding: 0;
    display: flex;
    align-items: center;
}

nav li {
    margin-right: 20px;
}

nav a {
    color: #f2f2f2;
    text-decoration: none;
    font-weight: 600;
    font-size: 16px;
    transition: color 0.3s ease;
}

nav a:hover {
    color: #d8a42c;
}

/* Main Content */
main {
    padding: 50px 20px;
    text-align: center;
}

.text-content {
    margin-bottom: 40px;
}

h2 {
    font-size: 32px;
    margin-bottom: 10px;
    line-height: 1.2;
}

p {
    font-size: 18px;
    margin-bottom: 40px;
    line-height: 1.5;
    color: #d8a42c;
}

.cards {
    display: flex;
    justify-content: space-around;
    flex-wrap: wrap;
}

.card {
    width: 30%;
    margin-bottom: 20px;
    background-color: #1f1f1f;
    padding: 20px;
    border-radius: 10px;
    box-shadow: 0 5px 15px rgba(0, 0, 0, 0.3);
    text-align: center;
    display: flex;
    flex-direction: column;
    align-items: center;
    transition: transform 0.3s ease, box-shadow 0.3s ease;
}

.card img {
    width: 100%;
    height: auto;
    margin-top: 15px;
    border-radius: 5px;
    object-fit: cover;
}

.card h3 {
    margin-top: 0;
    font-size: 24px;
    color: #d8a42c;
}

.card:hover {
    transform: translateY(-10px);
    box-shadow: 0 10px 20px rgba(0, 0, 0, 0.4);
}

/* Footer */
footer {
    background-color: #1f1f1f;
    color: #f2f2f2;
    padding: 20px 0;
    text-align: center;
    margin-top: 40px;
}

<h3 class="title underline white flex">
    <svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" 
        width="20px" height="20px" viewBox="0 0 55.203 53.747"
        xml:space="preserve" fill="#fff">
        <path d="M53.666,20.361c1.014,0,1.537-0.276,1.537-0.711c0-0.206-0.117-0.447-0.354-0.707c-0.146-0.154-0.332-0.318-0.561-0.487
            L30.197,0.785c-1.428-1.046-3.765-1.046-5.196,0L0.913,18.457C0.296,18.908,0,19.32,0,19.65c0,0.136,0.05,0.255,0.152,0.358
            c0.225,0.222,0.689,0.353,1.384,0.353h4.897v21.144H5.68c-1.235,0-2.238,1.004-2.238,2.238v2.562H2.458
            c-1.235,0-2.237,1.002-2.237,2.233v2.971c0,1.236,1.002,2.238,2.237,2.238h50.071c1.236,0,2.238-1.002,2.238-2.238v-2.971
            c0-1.231-1.002-2.233-2.238-2.233h-0.984v-2.562c0-1.234-1.002-2.238-2.236-2.238h-0.754V20.361H53.666z M18.272,41.504h-5.228
            V20.361h5.228V41.504z M30.105,41.504h-5.227V20.361h5.227V41.504z M27.601,13.337c-1.545,0-2.793-1.248-2.793-2.792
            c0-1.542,1.248-2.79,2.793-2.79c1.543,0,2.793,1.248,2.793,2.79C30.395,12.09,29.145,13.337,27.601,13.337z M41.947,41.504h-5.232
            V20.361h5.232V41.504z"/>
    </svg>
    <a href="/index.php" class="title-link">Library</a>
</h3>
<nav class="navigation">
    <ul class="nav-list">
        <li class="nav-item">
            <a href="/index.php" 
                class="<?= ($current_page == 'home.php') ? 'active' : '' ?>">
                <span class="nav-text">Home</span>
            </a>
        </li>
        <li class="nav-item icon-wrapper">
            <a href="/search.php" 
                class="<?= ($current_page == 'search.php') ? 'active' : '' ?>">
                <svg width="20px" height="20px" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" stroke="#fff"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <path d="M15.7955 15.8111L21 21M18 10.5C18 14.6421 14.6421 18 10.5 18C6.35786 18 3 14.6421 3 10.5C3 6.35786 6.35786 3 10.5 3C14.6421 3 18 6.35786 18 10.5Z" stroke="#fff" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path> </g></svg>
                <span class="nav-text">Search</span>
            </a>
        </li>
        <li class="nav-item icon-wrapper">
            <a href="/library.php" 
                class="<?= ($current_page == 'library.php') ? 'active' : '' ?>">
                <span class="nav-text">Library</span>
            </a>
        </li>
        <?php if(isset($_SESSION['user'])): ?>
            <li class="nav-item">
                <a href="/my_reservations.php" 
                    class="<?= ($current_page == 'my_reservations.php') ? 'active' : '' ?>">
                    <span class="nav-text">My Reservations</span>
                </a>
            </li>
        <?php endif; ?>
        <li class="nav-item icon-wrapper">
            <?php if(isset($_SESSION['user'])): ?>
                <a href="/account.php" 
                    class="<?= ($current_page == 'account.php') ? 'active' : '' ?>">
                    <svg fill="#fff" width="20px" height="20px" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" stroke="#fff"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"><title>Account Settings</title><path d="M9.6,3.32a3.86,3.86,0,1,0,3.86,3.85A3.85,3.85,0,0,0,9.6,3.32M16.35,11a.26.26,0,0,0-.25.21l-.18,1.27a4.63,4.63,0,0,0-.82.45l-1.2-.48a.3.3,0,0,0-.3.13l-1,1.66a.24.24,0,0,0,.06.31l1,.79a3.94,3.94,0,0,0,0,1l-1,.79a.23.23,0,0,0-.06.3l1,1.67c.06.13.19.13.3.13l1.2-.49a3.85,3.85,0,0,0,.82.46l.18,1.27a.24.24,0,0,0,.25.2h1.93a.24.24,0,0,0,.23-.2l.18-1.27a5,5,0,0,0,.81-.46l1.19.49c.12,0,.25,0,.32-.13l1-1.67a.23.23,0,0,0-.06-.3l-1-.79a4,4,0,0,0,0-.49,2.67,2.67,0,0,0,0-.48l1-.79a.25.25,0,0,0,.06-.31l-1-1.66c-.06-.13-.19-.13-.31-.13L19.5,13a4.07,4.07,0,0,0-.82-.45l-.18-1.27a.23.23,0,0,0-.22-.21H16.46M9.71,13C5.45,13,2,14.7,2,16.83v1.92h9.33a6.65,6.65,0,0,1,0-5.69A13.56,13.56,0,0,0,9.71,13m7.6,1.43a1.45,1.45,0,1,1,0,2.89,1.45,1.45,0,0,1,0-2.89Z"></path></g></svg>
                    <span class="nav-text">Account</span>
                </a>
            <?php else: ?>
                <a href="/login.php" 
                    class="<?= ($current_page == 'login.php') ? 'active' : '' ?>">
                    <svg width="20px" height="20px" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <path d="M12 20C16.4183 20 20 16.4183 20 12C20 7.58172 16.4183 4 12 4" stroke="#fff" stroke-width="1.5" stroke-linecap="round"></path> <path d="M4 12H14M14 12L11 9M14 12L11 15" stroke="#fff" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path> </g></svg>
                    <span class="nav-text">Login</span>    
                </a>
            <?php endif; ?>
        </li>
    </ul>
</nav>   
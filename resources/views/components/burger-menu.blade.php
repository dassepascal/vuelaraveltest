
<div id="burger-menu">
    <button @click="toggleMenu" class="burger-menu-button">
        <span class="burger-menu-icon"></span>
    </button>
    <ul v-if="showMenu" class="burger-menu-list">
        <!-- Menu items go here -->
        <li><a href="">route1</a></li>
    </ul>
</div>

<script>
    export default {
        data() {
            return {
                showMenu: true
            };
        },
        methods: {
            toggleMenu() {
                console.log('toggleMenu');
                this.showMenu = !this.showMenu;
            }
        }
    };
</script>
<style scoped>
    #burger-menu {
        position: relative;
    }

    .burger-menu-button {
        background: red;
        border: none;
        cursor: pointer;
        height: 40px;
        position: relative;
        width: 40px;
    }

    /* .burger-menu-icon,
    .burger-menu-icon::before,
    .burger-menu-icon::after {
        background-color: #000;
        border-radius: 2px;
        content: '';
        display: block;
        height: 4px;
        left: 50%;
        margin-left: -10px;
        position: absolute;
        transition: all 0.2s ease-in-out;
        width: 20px;
    }

    .burger-menu-icon::before {
        top: 10px;
    }

    .burger-menu-icon::after {
        bottom: 10px;
    }

    .burger-menu-list {
        background-color: #fff;
        border-radius: 4px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
        list-style-type: none;
        margin: 0;
        padding: 20px;
        position: absolute;
        right: 0;
        top: 40px;
        width: 200px;
    }

    .burger-menu-list li {
        margin-bottom: 10px;
    }

    .burger-menu-list a {
        color: #000;
        text-decoration: none;
    }

    .burger-menu-list a:hover {
        text-decoration: underline;
    }

    .burger-menu-list a:active {
        color: #000;
    } */

    /* @media (min-width: 768px) {
        .burger-menu-button {
            display: none;
        }

        .burger-menu-list {
            position: static;
            box-shadow: none;
            width: auto;
        }
    } */
</style>


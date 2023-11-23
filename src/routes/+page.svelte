<script>
    let username = "tibo"

    let music = "highwayToHell";
    let Lyrics;

    import(`../components/lyrics/${music}.svelte`).then(module => {
        Lyrics = module.default || module;
    });
</script>

<header>
    <div>
        <span>Jukebox</span>
    </div>
    <div>
    { username }
    </div>
</header>
<main>
    {#if Lyrics}
        <svelte:component this={Lyrics} />
    {/if}
</main>

<style>
    @font-face {
        font-family: 'FugazOne';
        src: url(../components/fonts/FugazOne-Regular.ttf);
    }

    header {
        color: white;

        display: flex;
        justify-content: space-between;

        height: 5vh;
    }
    header > div {
        margin-inline: 1vh;
    }
    header > div:first-child{
        display: flex;
        align-items: center;

        font-size: 4vh;
    }
    header > div:first-child > span {
        font-family: FugazOne;
        background-color: red;
    }
    header > div:last-child{
        display: flex;
        align-items: center;
        font-family: 'Courier New', Courier, monospace;
    }

    main {
        background-color: blue;
        margin: 1vh;
    }
</style>
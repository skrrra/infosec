<template>
    <div class="bg-gray-900">
        <div class="mt-6 flex justify-center">
            <img class="rounded" src="http://images.ctfassets.net/sdlntm3tthp6/ss-asset-11269/1f7497c1737b8419764f11ff5e126e42/assets_Uploads_bravenewcoin-cryptocurrency-hack-banner2.jpg"
                 alt="banner" width="1600">
        </div>
        <LiveHackers :liveChannels="liveChannels"></LiveHackers>
    </div>

</template>

<script>
    import LiveHackers from '@/Components/LiveHackers'

    export default {
        components:{
            LiveHackers,
        },
        props: ['liveChannels']
    }
</script>

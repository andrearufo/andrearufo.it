import '@popperjs/core';
import 'bootstrap';

import axios from 'axios';

new Vue({
    el: '#home-spotify',

    data: {
        endpoint: 'https://api.spotify.com/v1/me/player/currently-playing',
        token: 'BQBiDCylwTE7nu5kEmrWKEefXnTyh-zDcoiydV5Tu9spynUZl5jR8uFIQTxN_ujzg3zYz6wO2J1JWPvLy1L-175Vs5hg6exznTYqYC--6HCxACTW4TlWdScvDUQPCS45e0RONLilRtBF0V40L3oY',
        track: false,
    },

    computed: {
        play(){
            if(this.track)
                return {
                    artist: this.track.item.artists.map( (item) => { return item.name }).join(', '),
                    title: this.track.item.name,
                    year: this.track.item.album.release_date.substring(0, 4),
                    link: this.track.item.external_urls.spotify
                }
            else
                return false;
        }
    },

    methods: {
        getTrack(){
            axios.get(this.endpoint, {
                headers: {
                    common: {
                        'Authorization': `Bearer ${this.token}`
                    }
                }
            })
            .then( ({data}) => {
                this.track = data;
                console.log(this.track);
            } )
            .catch((error) => {
                console.warn('flashDanger', error.response.data)
            })
        }
    },

    created(){
        this.getTrack();
    }
})
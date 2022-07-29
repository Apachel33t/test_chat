<template>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <textarea class="form-control" rows="10" readonly="">{{messages.join('\n')}}</textarea>
                <hr>
                {{this.dialog}}
                <input type="text" class="form-control" v-model="textMessage" @keyup.enter="sendMessage">
            </div>
        </div>
    </div>
</template>

<script>
export default {
    data() {
        return {
            messages: [],
            textMessage: '',
            dialog_id: ''
        }
    },
    mounted() {
        axios
            .get('http://127.0.0.1:8000/dialog/1')
            .then(res => {
                this.dialog_id = res.data.id
                window.Echo.private(`dialog.${res.data.id}`)
                    .listen('.SendMessage', ({data}) => {
                        this.messages.push(data.body)
                    });
            })
    },
    methods: {
        sendMessage() {
            let success = 0;
            let errors = 0;
            const start= new Date().getTime();
            for (let i = 0; i < 1000000; i++) {
                setTimeout(() => {
                    axios.post('/messages',
                        {
                            body: "МАААААААААААААААу МАААААААААААААААу МАААААААААААААААу МАААААААААААААААу МАААААААААААААААу МАААААААААААААААу МАААААААААААААААу МАААААААААААААААу МАААААААААААААААу МАААААААААААААААу  МАААААААААААААААу МАААААААААААААААу МАААААААААААААААу МАААААААААААААААу МАААААААААААААААу  МАААААААААААААААу МАААААААААААААААу МАААААААААААААААу МАААААААААААААААу МАААААААААААААААу МАААААААААААААААу МАААААААААААААААу МАААААААААААААААу МАААААААААААААААу МАААААААААААААААу МАААААААААААААААу МАААААААААААААААу МАААААААААААААААу МАААААААААААААААу МАААААААААААААААу  МАААААААААААААААу МАААААААААААААААу МАААААААААААААААу МАААААААААААААААу МАААААААААААААААу  МАААААААААААААААу МАААААААААААААААу МАААААААААААААААу МАААААААААААААААу МАААААААААААААААу  МАААААААААААААААу МАААААААААААААААу МАААААААААААААААу МАААААААААААААААу МАААААААААААААААу МАААААААААААААААу МАААААААААААААААу МАААААААААААААААу МАААААААААААААААу МАААААААААААААААу  МАААААААААААААААу МАААААААААААААААу МАААААААААААААААу МАААААААААААААААу МАААААААААААААААу  МАААААААААААААААу МАААААААААААААААу МАААААААААААААААу МАААААААААААААААу МАААААААААААААААу",
                            dialog_id: this.dialog_id
                        })
                        .then(res => {
                            console.log(success++)
                        })
                        .catch(err => {
                            console.log(errors++)
                        })
                }, 100)
            }

            const end = new Date().getTime();

            console.log(`SecondWay: ${end - start}ms`);

            this.messages.push(this.textMessage);

            this.textMessage = '';
        }
    }
}
</script>

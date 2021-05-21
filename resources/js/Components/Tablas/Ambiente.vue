<template>
    <div class="custom-select" :tabindex="tabindex">
        <div @click="borrar()" :disabled="disabled" v-if="!disabled" class="pointer">
            <i class="fas fa-times selecticon1" v-if="selected"></i>
        </div>
        <div class="selected" :class="{ open: open }" @click="open = true">
            <i class="fas fa-chevron-up selecticon" v-if="!disabled"></i>
            <input type="text" class="input" v-model="selected" :placeholder="placeholder" :disabled="disabled" @keyup="open=true">
        </div>
        <template v-if="!disabled">
            <div class="items" :class="{ selectHide: !open }" v-if="options.length">
                <div v-for="(option, i) of options" :key="i"  @click=" selected = option.nombre; open = false; $emit('input', option.id)">
                    {{ option.nombre }}
                </div>
            </div>
            <div class="items" :class="{ selectHide: !open }" v-else>
                <div>
                    Sin valores
                </div>
            </div>
        </template>
    </div>
</template>

<script>
    import $ from "jquery";

    export default {
        props: {
            default: {
                type: String,
                required: false,
                default: null,
            },
            tabindex: {
                type: Number,
                required: false,
                default: 0,
            },
            disabled: {
                type: Boolean,
                required: false,
                default: false,
            },
            placeholder: {
                type: String,
                required: false,
                default:'Seleccione'
            },
            value: {
                required: false,
                default: false
            }
        },
        data() {
            return {
                options: [{nombre:'Producción', id: 1}, {nombre:'Pruebas', id: 2}],
                selected: "",
                open: false,
                valor: this.value
            };
        },
        methods: {
            salida(e){
                var container = $(".custom-select");
                if (!container.is(e.target) && container.has(e.target).length === 0) {
                    this.open=false;
                }
            },
            borrar(){
                this.selected = "";
                this.$emit('input', "");
                this.open=true;
            },
            recuperar(){
                if(this.valor){
                    this.options.forEach(el => {
                        if(el.id == this.valor){
                            this.selected = el.nombre;
                            this.$emit("input", el.id);
                            return;
                        }
                    });
                }
            }
        },
        mounted() {
            this.$emit("input", this.selected);
            this.recuperar();
            let me = this;
            $(document).on("click",function(e) {
                me.salida(e);
            });
        },
    };
</script>

<style scoped>
    .custom-select {
        position: relative;
        width: 100%;
        text-align: left;
        outline: none;
        line-height: 35px;
        color: -internal-light-dark(black, white);
    }
    .custom-select .selected {
        background: transparent;
        border: none;
        border-bottom: 1px solid #d2d6dc;
        height: 41px;
        cursor:pointer;
    }
    .custom-select .selected input{
        height: 100%;
        padding: 3px 30px 0px 10px;
        width: 100%;
    }
    .custom-select .selected.open {
        border-radius: 6px 6px 0px 0px;
        -webkit-transition: all .3s ease;
        -moz-transition: all .3s ease;
        -ms-transition: all .3s ease;
        -o-transition: all .3s ease;
        transition: all .3s ease;
    }
    .custom-select .selected.open .selecticon {
        -moz-transform: rotate(180deg);
        -webkit-transform: rotate(180deg);
        -o-transform: rotate(180deg);
        -ms-transform: rotate(180deg);
        transform: rotate(180deg);
        -webkit-transition: all .3s ease;
        -moz-transition: all .3s ease;
        -ms-transition: all .3s ease;
        -o-transition: all .3s ease;
        transition: all .3s ease;
    }
    .custom-select .items {
        color: #656565;
        border-radius: 0px 0px 6px 6px;
        overflow: auto;
        position: absolute;
        background-color: #ffffff;
        left: 0;
        right: 0;
        z-index: 1;
        max-height: 280px;
    }
    .items::-webkit-scrollbar {
        -webkit-appearance: none;
    }

    .items::-webkit-scrollbar:vertical {
        width:10px;
    }

    .items::-webkit-scrollbar-button:increment,.items::-webkit-scrollbar-button {
        display: none;
    }

    .items::-webkit-scrollbar:horizontal {
        height: 10px;
    }

    .items::-webkit-scrollbar-thumb {
        background-color: #797979;
        border-radius: 20px;
        border: 2px solid #f1f2f3;
    }

    .items::-webkit-scrollbar-track {
        border-radius: 10px;
    }
    .custom-select .items div {
        color: #656565;
        padding-left: 1em;
        cursor: pointer;
        user-select: none;
    }
    .custom-select .items div:hover {
        background-color: rgba(0,0,0,.1);
    }
    .selectHide {
        display: none;
        -webkit-transition: all .3s ease;
        -moz-transition: all .3s ease;
        -ms-transition: all .3s ease;
        -o-transition: all .3s ease;
        transition: all .3s ease;
    }
    .selecticon{
        position: absolute;
        right: 10px;
        top: 18px;
        font-size: 12px;
        color:#7b7b7b;
        -webkit-transition: all .3s ease;
        -moz-transition: all .3s ease;
        -ms-transition: all .3s ease;
        -o-transition: all .3s ease;
        transition: all .3s ease;
    }
    .selecticon1{
        position: absolute;
        right: 25px;
        top: 18px;
        font-size: 12px;
        color:#7b7b7b;
    }
    .pointer{
        cursor:pointer;
    }
</style>


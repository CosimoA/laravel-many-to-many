
<script>
    import axios from 'axios';

    export default {
        name: 'TechnologyComp',
        data() {
            return {
                // Array con tecnologie esistenti
                technologies: [],
                // Stato per gestire la visibilità del form
                techFormActive: false,
                // Oggetto per memorizzare i dati del nuovo technology tramite v-model nel form
                newTechnology: { 
                    name: '',
                    description: ''
                } 
            };
            
        },
        mounted() {
            this.getTechnologies();
        },
        methods: {
            // Funzione per ottenere i dati delle tecnologie
            getTechnologies() {
                axios.get('http://localhost:8000/api/v1/technologies')
                    .then(res => {
                        this.technologies = res.data;
                    })
                    .catch(err => console.error(err))
            },
            // Metodo per creare una nuova tecnologia
            createTechnology() {
                axios.post('http://localhost:8000/api/v1/technologies', this.newTechnology)
                    .then(response => {
                        // Gestione della risposta dopo la creazione della tecnologia
                        console.log('New technology created:', response.data);
                        // Azzeramento del form e aggiornamento dell'elenco delle tecnologie
                        this.newTechnology.name = '';
                        this.newTechnology.description = '';
                        this.techFormActive = false;
                        this.getTechnologies();
                    })
                    .catch(error => {
                        console.error('Error creating new technology:', error);
                    });
            }
        },
    };
</script>

<template>
    <div>
        <h1>Technologies</h1>

        <div>
            <div v-if="!techFormActive">
                <!-- Bottone per attivare il form di creazione -->
                <button @click="techFormActive = !techFormActive">CREATE NEW TECHNOLOGY</button>
                <ul>
                    <li v-for="technology in technologies" :key="technology.id">
                        <strong>{{ technology.name }}: </strong>{{ technology.description }}
                    </li>
                </ul>
            </div>

            <!-- Form per la creazione di una nuova tecnologia -->
            <form @submit.prevent="createTechnology" v-else>
                <label for="name">Name</label><br>
                <input type="text" name="name" id="name" v-model="newTechnology.name">
                <br>

                <label for="description">Description</label><br>
                <input type="text" name="description" id="description" v-model="newTechnology.description">
                <br>
                <br>

                <div>
                    <!-- Pulsante per annullare l'operazione -->
                    <button @click.prevent="techFormActive = !techFormActive">Cancel</button>
                    <!-- Pulsante di invio del form -->
                    <button type="submit">Create</button>
                </div>
            </form>
        </div>
    </div>
</template>
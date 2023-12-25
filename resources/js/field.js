import IndexField from './components/IndexField'
import DetailField from './components/DetailField'
import FormField from './components/FormField'

Nova.booting((app, store) => {
  app.component('index-belongstomany', IndexField)
  app.component('detail-belongstomany', DetailField)
  app.component('form-belongstomany', FormField)
})

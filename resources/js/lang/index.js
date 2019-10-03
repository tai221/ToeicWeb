import Vue from 'vue'
import VueI18n from 'vue-i18n'
import Cookies from 'js-cookie'
import vnLocale from './vn'
import enLocale from './en'

Vue.use(VueI18n)

const messages = {
    vn: vnLocale,
    en: enLocale
}

const i18n = new VueI18n({
    locale: Cookies.get('language') || 'en',
    messages
})

export default i18n

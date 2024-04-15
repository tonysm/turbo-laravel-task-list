import { Controller } from "@hotwired/stimulus"

// Connects to data-controller="form"
export default class extends Controller {
    static targets = ['cancel']

    cancelByKeyboard(event) {
        if (event.shiftKey || ! this.hasCancelTarget) return;

        event.preventDefault()
        this.cancelTarget.click()
    }
}

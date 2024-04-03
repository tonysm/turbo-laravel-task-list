import { Controller } from "@hotwired/stimulus"

// Connects to data-controller="flash"
export default class extends Controller {
    remove() {
        this.element.remove();
    }
}

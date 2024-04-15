import { Controller } from "@hotwired/stimulus"
import { enter, leave } from "el-transition"

// Connects to data-controller="dropdown"
export default class extends Controller {
    static values = {
        open: { type: Boolean, default: false },
    }

    static targets = ['content']

    open() {
        this.openValue = true
    }

    close() {
        this.openValue = false
    }

    toggle() {
        this.openValue = !this.openValue
    }

    closeWhenClickedOutside(event) {
        if (! this.openValue) return
        if (event.target === this.element) return
        if (this.element.contains(event.target)) return

        this.close()
    }

    openValueChanged() {
        if (this.openValue) {
            enter(this.contentTarget)
        } else {
            leave(this.contentTarget)
        }
    }
}

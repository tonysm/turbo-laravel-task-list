import { BridgeComponent, BridgeElement } from "@hotwired/strada"

// Connects to data-controller="bridge--dropdown"
export default class extends BridgeComponent {
    static component = "dropdown"
    static targets = ["title", "item"]

    open(event) {
        if (! this.enabled) return

        event.stopImmediatePropagation()
        this.#notifyBridgeToDisplayMenu()
    }

    #notifyBridgeToDisplayMenu() {
        const title = new BridgeElement(this.titleTarget).title
        const items = this.#makeMenuItems(this.itemTargets)

        this.send("display", { title, items }, message => {
            const selectedIndex = message.data.selectedIndex
            const selectedItem = new BridgeElement(this.itemTargets[selectedIndex])

            selectedItem.click()
        })
    }

    #makeMenuItems(elements) {
        return elements
            .map((element, index) => this.#menuItem(element, index))
            .filter(item => item)
    }

    #menuItem(element, index) {
        const bridgeElement = new BridgeElement(element)

        if (bridgeElement.disabled) return null

        return {
            title: bridgeElement.title,
            index: index,
        }
    }
}

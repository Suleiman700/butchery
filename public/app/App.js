
import Sheep from '../javascript/Classes/Sheep.js';
import View_JobSelection from './views/View_JobSelection.js';

import SheepView from './views/sheep_views/SheepView.js';
import SheepView_StationSelection from './views/sheep_views/SheepView_StationSelection.js';
import SheepView_StationOne from './views/sheep_views/SheepView_StationOne.js';
import SheepView_StationTwo from './views/sheep_views/SheepView_StationTwo.js';

export default class App {
    #appContainerHTMLElement = null;
    #currentView = null;
    views = {
        jobSelection: new View_JobSelection(this),
        sheepStationSelection: new SheepView_StationSelection(this),
        sheep: {
            stationOne: new SheepView([new SheepView_StationOne(this), new SheepView_StationTwo(this)]),
            stationTwo: new SheepView([new SheepView_StationTwo(this)]),
        },
        cow: {
            stationOne: new Sheep([]),
        }
    }
    settings = {
        enableDeveloperTools: true
    }

    constructor() {}

    /**
     * Set app container to be rendered inside a specific HTML element
     * @param _targetHTMLElement {HTMLElement}
     */
    setAppContainer(_targetHTMLElement) {
        this.#appContainerHTMLElement = _targetHTMLElement
        if (!this.isValidAppContainer()) {
            this.#appContainerHTMLElement = null
            alert('Invalid App Container')
        }
    }

    setCurrentView(_viewString) {
        let currentView = this.views;

        if (_viewString.includes('.')) {
            const viewKeys = _viewString.split('.');

            for (const key of viewKeys) {
                if (currentView[key] === undefined) {
                    Swal.fire({
                        icon: 'error',
                        title: `View [${_viewString}] does not exist`,
                    })
                    throw new Error(`View [${_viewString}] does not exist`);
                }
                currentView = currentView[key];
            }
        }
        else {
            if (currentView[_viewString] === undefined) {
                throw new Error(`View #${_viewString} does not exist`);
            }
            currentView = currentView[_viewString];
        }

        this.#currentView = currentView
    }

    async renderView() {
        if (!this.isValidAppContainer()) {
            alert('Invalid App Container')
            return
        }

        const appContainer = this.#appContainerHTMLElement

        // Remove rendered views from DOM
        appContainer.innerHTML = ''

        const view = this.#currentView

        // Add view to DOM
        appContainer.appendChild(await view.html())

        // Set page title
        document.title = view.viewSettings.title

        // Show buttons based on view settings
        if (view.viewSettings.showChangeJobBtn) {
            const btnChangeJob = document.createElement('button')
            btnChangeJob.className = 'btn btn-outline-primary mx-2'
            btnChangeJob.id = 'btn-change-job'
            btnChangeJob.textContent = 'שינוי סוג עבודה'
            document.querySelector('#view-buttons').appendChild(btnChangeJob)

            btnChangeJob.addEventListener('click', () => {
                Swal.fire({
                    icon: 'question',
                    title: 'שינוי סוג עבודה',
                    html: '? האם אתה רוצה לשנות סוג עבודה',
                    confirmButtonText: 'כן',
                    showDenyButton: true,
                    denyButtonText: 'לא',
                }).then((result) => {
                    if (result.isConfirmed) {
                        this.setCurrentView('jobSelection')
                        this.renderView()
                    }
                })
            })
        }

        // Show buttons based on view settings
        if (view.viewSettings.showChangeAccountBtn) {
            const btnChangeJob = document.createElement('button')
            btnChangeJob.className = 'btn btn-outline-primary mx-2'
            btnChangeJob.id = 'btn-change-job'
            btnChangeJob.textContent = 'שינוי משתמש'
            document.querySelector('#view-buttons').appendChild(btnChangeJob)

            btnChangeJob.addEventListener('click', () => {
                Swal.fire({
                    icon: 'question',
                    title: 'שינוי משתמש',
                    html: '? האם אתה רוצה לשנות משתמש',
                    confirmButtonText: 'כן',
                    showDenyButton: true,
                    denyButtonText: 'לא',
                }).then((result) => {
                    if (result.isConfirmed) {
                        console.log('clicked')
                    }
                })
            })
        }
    }

    /**
     * Check if valid app container
     * @return {boolean}
     */
    isValidAppContainer() {
        if (this.#appContainerHTMLElement instanceof HTMLElement) {
            return true
        }
        else {
            return false
        }
    }
}

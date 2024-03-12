document.addEventListener("DOMContentLoaded", function() {
    let selectedUnits = [];

    const checkboxes = document.querySelectorAll('.checkbox');
    checkboxes.forEach(checkbox => {
        checkbox.addEventListener('change', updateDisplayOnChange);
    });

    const issueSelects = document.querySelectorAll('.issue');
    issueSelects.forEach(select => {
        select.addEventListener('change', updateDisplayOnChange);
    });

    function updateDisplayOnChange() {
        selectedUnits = [];
        checkboxes.forEach(checkbox => {
            const unitID = checkbox.dataset.unitId;
            const issueSelect = document.querySelector(`.issue[data-unit-id="${unitID}"]`);
            const issue = issueSelect.value || '';
            if (checkbox.checked) {
                selectedUnits.push({ unit_ID: unitID, report_issue: issue, problem_desc: '' });
            }
        });
        updateDisplay(selectedUnits);
    }

    function updateDisplay(units) {
        const unitInfoContainer = document.querySelector('.unitInfoContainer');
        unitInfoContainer.innerHTML = ''; 

        units.forEach((item, index) =>  {
            
            const subContainer = document.createElement('div');
            subContainer.classList.add('subInfoContainer');

            const unitNumber = document.createElement('div');
            unitNumber.classList.add('subInfoContainer1');
            unitNumber.innerHTML = '<p>Unit ID</p>';
            subContainer.appendChild(unitNumber);

            const unitIDContainer = document.createElement('div');
            unitIDContainer.classList.add('textContainer');
            const unitIDText = document.createElement('div');
            unitIDText.classList.add('subTextContainer');
            unitIDText.textContent = item.unit_ID;
            unitIDText.id = 'unitID_' + index;
            unitIDContainer.appendChild(unitIDText);
            subContainer.appendChild(unitIDContainer);

            const issueContainer = document.createElement('div');
            issueContainer.classList.add('subInfoContainer1');
            issueContainer.innerHTML = '<p>Issue</p>';
            subContainer.appendChild(issueContainer);

            const issueTextContainer = document.createElement('div');
            issueTextContainer.classList.add('textContainer');
            const issueText = document.createElement('div');
            issueText.classList.add('subTextContainer');
            issueText.textContent = item.report_issue;
            issueText.id = 'issue_' + index;
            issueTextContainer.appendChild(issueText);
            subContainer.appendChild(issueTextContainer);

            const additionalIssueExplanation = document.createElement('div');
            additionalIssueExplanation.classList.add('subInfoContainer1');
            additionalIssueExplanation.innerHTML = '<p>Problem description</p>';
            additionalIssueExplanation.style.justifyContent = 'flex-start';
            additionalIssueExplanation.style.marginLeft = '1rem';
            subContainer.appendChild(additionalIssueExplanation);

            const additionalIssueContainer = document.createElement('div');
            additionalIssueContainer.classList.add('textContainer1');
            const additionalIssueText = document.createElement('input'); 
            additionalIssueText.classList.add('subTextContainer1');
            additionalIssueText.value = item.problem_desc;
            additionalIssueText.setAttribute('type', 'text');   
            additionalIssueText.setAttribute('placeholder', 'Enter unit problem description'); 
            additionalIssueText.style.fontWeight = '100';
            additionalIssueText.style.alignItems = 'start';
            additionalIssueContainer.appendChild(additionalIssueText);
            subContainer.appendChild(additionalIssueContainer);


            unitInfoContainer.appendChild(subContainer);

            const unitID = document.getElementById('unitID_' + index); 
            const issue = document.getElementById('issue_' + index); 
            const subTextContainers = [unitID, issue];
            subTextContainers.forEach(container => {
                container.style.maxWidth = '50%'; 
            });

            if (index < units.length - 1) {
                const space = document.createElement('div');
                space.classList.add('container-space');
                space.style.height = '17rem'; 
                space.style.overflowX = 'hidden'; 
                space.style.marginLeft = '37px';
                space.style.borderBottom = '2px solid rgb(2, 116, 200)'; 
                space.style.maxWidth = 'calc(80% + 10px)';
                unitInfoContainer.appendChild(space);
            }
        });
    }

    document.getElementById('buttonContainer').addEventListener('submit', function(event) {
        event.preventDefault(); 

        const unitIDInput = document.getElementById('unit_ID');
        const issueInput = document.getElementById('issue');

        unitIDInput.value = '';
        issueInput.value = '';

        selectedUnits.forEach((selectedUnit, index) => {
            // para sa hidden input
            unitIDInput.value += selectedUnit.unit_ID;
            issueInput.value += selectedUnit.report_issue;

            if (index < selectedUnits.length - 1) {
                unitIDInput.value += '\n';
                issueInput.value += '\n';
            }
        });


        const problemDescriptions = document.querySelectorAll('.subTextContainer1');
        let allProblemDesc = ""; 

        problemDescriptions.forEach(input => {
            if (input.tagName.toLowerCase() === "input" && input.value.trim() !== "") {
                allProblemDesc += input.value + "\n"; 
                input.setAttribute('readonly', 'readonly');
            }
        });

        const problemDescInput = document.getElementById('problem_desc');
        if (problemDescInput) { 
            problemDescInput.value = allProblemDesc.trim(); 
        }

        const submitContainer = document.getElementById('submitContainer');
        submitContainer.innerHTML = `
            <button class="button2" id="cancel-submit" type"button">Cancel</button>
            <button class="button2" id="confirm-submit" style="width: 10rem;">Confirm Submit</button>
        `;
        document.getElementById('confirm-submit').addEventListener('click', function() {
            document.getElementById('buttonContainer').submit();
        });
        
        document.getElementById('cancel-submit').addEventListener('click', function() {
            window.location.reload(); 
        });
    });

});

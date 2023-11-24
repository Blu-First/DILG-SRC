// Barangay List
const barangays = [
    "Aplaya", "Balibago", "Caingin", "Dila", "Dita", "Don Jose",
    "Ibaba", "Kanluran", "Labas", "Macabling", "Malitlit", "Malusak",
    "Market Area", "Pooc", "Pulong Santa Cruz", "Santo Domingo", "Sinalhan", "Tagapo"
];

const brgySelect = document.querySelector('.brgySelect');

barangays.forEach(barangay => {
    const option = document.createElement('option');
    option.value = barangay; // Set both value and text to the barangay
    option.text = barangay;
    brgySelect.appendChild(option);
});

// Criteria List
const criteria = [
    "Financial Administration and Sustainability",
    "Disaster Preparedness",
    "Safety, Peace, and Order",
    "Social Protection and Sensitivity",
    "Business Friendliness and Competitiveness",
    "Environmental Management"
];

const coreGovernanceOptgroup = document.querySelector('.criteriaSelect optgroup[label="Core Governance Area"]');
const essentialGovernanceOptgroup = document.querySelector('.criteriaSelect optgroup[label="Essential Governance Area"]');

// Populate options for Core Governance Area
criteria.slice(0, 3).forEach(criterion => {
    const option = document.createElement('option');
    option.value = criterion;
    option.text = criterion;
    coreGovernanceOptgroup.appendChild(option);
});

// Populate options for Essential Governance Area
criteria.slice(3).forEach(criterion => {
    const option = document.createElement('option');
    option.value = criterion;
    option.text = criterion;
    essentialGovernanceOptgroup.appendChild(option);
});

// Submission State List
const submissionStatusOptions = ["Pending", "Submitted"];

const submStatusSelect = document.querySelector('.submStatusSelect');

submissionStatusOptions.forEach(optionText => {
    const option = document.createElement('option');
    option.value = optionText; 
    option.text = optionText;
    submStatusSelect.appendChild(option);
});



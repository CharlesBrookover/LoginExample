/*
 Form Validation
 */
const validate = (event) => {
  event.preventDefault();
  const elements = event.target.elements;
  let valid = requiredValues(elements);
  if (!valid) {
    console.log('Required Fields Not Completed');
  }
  else {
    valid = comparePassword(elements);
    if (!valid) {
      console.log('Passwords Not Matching');
    }
  }

  return valid;
};

const passwordValidate = (event) => {
  event.preventDefault();

  return comparePassword(event.target.elements);
};

/**
 *
 * @param elements
 * @returns {boolean}
 */
const requiredValues = (elements) => {
  let valid = true;
  const required = Array.from(elements).filter(item => item.hasAttribute('required'));
  for (const element of required) {
    if (element.value.trim().length === 0) {
      valid = false;
    }
  }

  return valid;
};

const comparePassword = (elements) => {
  let valid = true;
  const password = elements['password'] ?? null;
  if (password) {
    const minLength = password.getAttribute('minLength');
    if (minLength && password.value.trim().length < minLength) {
      valid = false;
    }
    else {
      const confirmPassword = elements['confirmPassword'] ?? null;
      if (confirmPassword) {
        if (password.value.trim() !== confirmPassword.value.trim()) {
          valid = false;
        }
      }
      else {
        valid = false;
      }
    }
  }

  return valid;
};


